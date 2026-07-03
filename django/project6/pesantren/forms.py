from django import forms
from .models import PesanKontak, PendaftaranSantri, ProgramUnggulan

class PesanKontakForm(forms.ModelForm):
    class Meta:
        model = PesanKontak
        fields = ['nama', 'email', 'telepon', 'subjek', 'pesan']
        widgets = {
            'nama': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Nama Lengkap Anda',
                'id': 'contact_nama'
            }),
            'email': forms.EmailInput(attrs={
                'class': 'form-control',
                'placeholder': 'Alamat Email Anda',
                'id': 'contact_email'
            }),
            'telepon': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Nomor WhatsApp/Telepon (e.g. 081234567890)',
                'id': 'contact_telepon'
            }),
            'subjek': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Subjek Pertanyaan',
                'id': 'contact_subjek'
            }),
            'pesan': forms.Textarea(attrs={
                'class': 'form-control',
                'placeholder': 'Tuliskan pesan atau pertanyaan Anda secara rinci...',
                'rows': 4,
                'id': 'contact_pesan'
            }),
        }

class PendaftaranSantriForm(forms.ModelForm):
    program_pilihan = forms.ModelChoiceField(
        queryset=ProgramUnggulan.objects.all(),
        empty_label="Pilih Program Pendidikan",
        widget=forms.Select(attrs={
            'class': 'form-select',
            'id': 'reg_program_pilihan'
        })
    )

    class Meta:
        model = PendaftaranSantri
        fields = [
            'nama_lengkap', 'tempat_lahir', 'tanggal_lahir', 
            'jenis_kelamin', 'nama_orang_tua', 'nomor_hp', 
            'alamat', 'program_pilihan'
        ]
        widgets = {
            'nama_lengkap': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Nama Lengkap Calon Santri',
                'id': 'reg_nama_lengkap'
            }),
            'tempat_lahir': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Tempat Lahir',
                'id': 'reg_tempat_lahir'
            }),
            'tanggal_lahir': forms.DateInput(attrs={
                'class': 'form-control',
                'type': 'date',
                'id': 'reg_tanggal_lahir'
            }),
            'jenis_kelamin': forms.Select(attrs={
                'class': 'form-select',
                'id': 'reg_jenis_kelamin'
            }),
            'nama_orang_tua': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Nama Lengkap Orang Tua / Wali',
                'id': 'reg_nama_orang_tua'
            }),
            'nomor_hp': forms.TextInput(attrs={
                'class': 'form-control',
                'placeholder': 'Nomor WhatsApp Orang Tua (e.g. 081234567890)',
                'id': 'reg_nomor_hp'
            }),
            'alamat': forms.Textarea(attrs={
                'class': 'form-control',
                'placeholder': 'Alamat Lengkap Rumah (RT/RW, Desa/Kelurahan, Kecamatan, Kabupaten/Kota, Provinsi)',
                'rows': 3,
                'id': 'reg_alamat'
            }),
        }
