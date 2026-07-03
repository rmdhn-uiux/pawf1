from django.test import TestCase
from django.urls import reverse
from datetime import date
from .models import ProgramUnggulan, Fasilitas, Testimoni, PesanKontak, PendaftaranSantri
from .forms import PesanKontakForm, PendaftaranSantriForm

class PesantrenModelTests(TestCase):
    def setUp(self):
        self.program = ProgramUnggulan.objects.create(
            nama="Program Test",
            deskripsi="Deskripsi Program Test",
            icon="fa-laptop-code",
            urutan=1
        )
        self.fasilitas = Fasilitas.objects.create(
            nama="Fasilitas Test",
            deskripsi="Deskripsi Fasilitas Test",
            icon="fa-mosque",
            urutan=1
        )
        self.testimoni = Testimoni.objects.create(
            nama="Testimoni Test",
            role="Alumni",
            pesan="Pesan Testimoni Test"
        )

    def test_program_unggulan_creation(self):
        self.assertEqual(str(self.program), "Program Test")
        self.assertEqual(self.program.urutan, 1)

    def test_fasilitas_creation(self):
        self.assertEqual(str(self.fasilitas), "Fasilitas Test")
        self.assertEqual(self.fasilitas.urutan, 1)

    def test_testimoni_creation(self):
        self.assertEqual(str(self.testimoni), "Testimoni Test (Alumni)")


class PesantrenViewTests(TestCase):
    def setUp(self):
        self.program = ProgramUnggulan.objects.create(
            nama="Tahfidzul Qur'an",
            deskripsi="Menghafal Qur'an",
            icon="fa-book-quran",
            urutan=1
        )

    def test_landing_page_renders(self):
        response = self.client.get(reverse('landing_page'))
        self.assertEqual(response.status_code, 200)
        self.assertContains(response, "Tahfidzul Qur'an")
        self.assertTemplateUsed(response, 'pesantren/landing.html')

    def test_kirim_pesan_valid_post(self):
        post_data = {
            'nama': 'Ahmad',
            'email': 'ahmad@example.com',
            'telepon': '08123456789',
            'subjek': 'Tanya Pendaftaran',
            'pesan': 'Bagaimana cara mendaftar?'
        }
        response = self.client.post(reverse('kirim_pesan'), data=post_data)
        self.assertRedirects(response, reverse('landing_page') + '#contact')
        self.assertEqual(PesanKontak.objects.count(), 1)
        
        pesan = PesanKontak.objects.first()
        self.assertEqual(pesan.nama, 'Ahmad')
        self.assertEqual(pesan.subjek, 'Tanya Pendaftaran')

    def test_kirim_pesan_invalid_post(self):
        # Missing required fields
        post_data = {
            'nama': '',
            'email': 'invalid-email',
            'telepon': '',
            'subjek': '',
            'pesan': ''
        }
        response = self.client.post(reverse('kirim_pesan'), data=post_data)
        # Should render landing.html with status 200 (not redirect) to show errors
        self.assertEqual(response.status_code, 200)
        self.assertEqual(PesanKontak.objects.count(), 0)
        self.assertTemplateUsed(response, 'pesantren/landing.html')

    def test_daftar_santri_valid_post(self):
        post_data = {
            'nama_lengkap': 'Zayd',
            'tempat_lahir': 'Jakarta',
            'tanggal_lahir': '2015-05-10',
            'jenis_kelamin': 'L',
            'nama_orang_tua': 'Abu Zayd',
            'nomor_hp': '08129876543',
            'alamat': 'Jl. Mawar No. 12',
            'program_pilihan': self.program.id
        }
        response = self.client.post(reverse('daftar_santri'), data=post_data)
        self.assertRedirects(response, reverse('landing_page') + '#daftar')
        self.assertEqual(PendaftaranSantri.objects.count(), 1)
        
        santri = PendaftaranSantri.objects.first()
        self.assertEqual(santri.nama_lengkap, 'Zayd')
        self.assertEqual(santri.program_pilihan, self.program)

    def test_daftar_santri_invalid_post(self):
        post_data = {
            'nama_lengkap': '',
            'tempat_lahir': '',
            'tanggal_lahir': '',
            'jenis_kelamin': 'X', # Invalid choice
            'nama_orang_tua': '',
            'nomor_hp': '',
            'alamat': '',
            'program_pilihan': ''
        }
        response = self.client.post(reverse('daftar_santri'), data=post_data)
        self.assertEqual(response.status_code, 200)
        self.assertEqual(PendaftaranSantri.objects.count(), 0)
        self.assertTemplateUsed(response, 'pesantren/landing.html')
