import os
import django

# Set up Django environment
os.environ.setdefault('DJANGO_SETTINGS_MODULE', 'django_project.settings')
django.setup()

from pesantren.models import ProgramUnggulan, Fasilitas, Testimoni

def seed_data():
    print("Seeding Program Unggulan...")
    programs = [
        {
            "nama": "Tahfidzul Qur'an",
            "deskripsi": "Program menghafal Al-Qur'an 30 Juz dengan metode mutqin (kuat) dan sanad yang bersambung hingga Rasulullah SAW, dipandu oleh hafizh-hafizh bersanad.",
            "icon": "fa-book-quran",
            "urutan": 1
        },
        {
            "nama": "Kajian Kitab Kuning",
            "deskripsi": "Pendalaman khazanah keilmuan Islam klasik (Fikih, Nahwu-Saraf, Aqidah, Akhlaq, Tafsir) menggunakan kurikulum terintegrasi dari pesantren salaf terkemuka.",
            "icon": "fa-book-open",
            "urutan": 2
        },
        {
            "nama": "Sains & Teknologi (IT)",
            "deskripsi": "Penguasaan pemrograman web modern, robotika, dan literasi digital agar santri siap menjadi technopreneur muslim yang unggul di era digital.",
            "icon": "fa-laptop-code",
            "urutan": 3
        },
        {
            "nama": "Bahasa Asing Intensif",
            "deskripsi": "Pembiasaan komunikasi harian menggunakan Bahasa Arab dan Inggris secara aktif melalui program immersion, pidato mingguan, dan kajian literatur asing.",
            "icon": "fa-language",
            "urutan": 4
        }
    ]

    for p in programs:
        ProgramUnggulan.objects.get_or_create(
            nama=p["nama"],
            defaults={"deskripsi": p["deskripsi"], "icon": p["icon"], "urutan": p["urutan"]}
        )

    print("Seeding Fasilitas...")
    facilities = [
        {
            "nama": "Masjid Jami' Pesantren",
            "deskripsi": "Pusat ibadah dan kegiatan rohani santri dengan arsitektur klasik-modern yang megah, bersih, dan ber-AC untuk kenyamanan beribadah.",
            "icon": "fa-mosque",
            "urutan": 1
        },
        {
            "nama": "Asrama Representatif",
            "deskripsi": "Kamar asrama yang bersih, dilengkapi dengan tempat tidur personal, lemari pakaian, ventilasi udara yang sehat, dan area belajar mandiri.",
            "icon": "fa-hotel",
            "urutan": 2
        },
        {
            "nama": "Laboratorium Komputer & Bahasa",
            "deskripsi": "Fasilitas lab komputer mutakhir untuk praktik coding dan pemrograman, serta laboratorium bahasa multimedia interaktif.",
            "icon": "fa-desktop",
            "urutan": 3
        },
        {
            "nama": "Perpustakaan Digital & Klasik",
            "deskripsi": "Koleksi ribuan kitab kuning fisik, referensi sains modern, serta portal e-library dengan akses ke jurnal-jurnal ilmiah internasional.",
            "icon": "fa-book",
            "urutan": 4
        },
        {
            "nama": "Sarana Olahraga Terpadu",
            "deskripsi": "Area olahraga luas yang meliputi lapangan futsal, basket, bulu tangkis, serta fasilitas latihan panahan yang aman bagi santri.",
            "icon": "fa-dumbbell",
            "urutan": 5
        }
    ]

    for f in facilities:
        Fasilitas.objects.get_or_create(
            nama=f["nama"],
            defaults={"deskripsi": f["deskripsi"], "icon": f["icon"], "urutan": f["urutan"]}
        )

    print("Seeding Testimoni...")
    testimonials = [
        {
            "nama": "H. Ahmad Fauzi",
            "role": "Wali Santri",
            "pesan": "Alhamdulillah, setelah 2 tahun di sini, putra kami tidak hanya hafal 10 juz Al-Qur'an dengan tajwid yang baik, tetapi juga mahir membuat program web dasar dan aktif berbahasa Arab. Pembinaannya sangat telaten.",
            "foto_url": "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&q=80&w=150"
        },
        {
            "nama": "Aisyah Humaira, S.Kom.",
            "role": "Alumni (Angkatan 2021)",
            "pesan": "Pesantren ini memberikan bekal luar biasa. Keseimbangan antara ilmu agama (kitab kuning) dan teknologi (IT) membuat saya bisa kuliah IT sambil mengajar ngaji di lingkungan sekitar dengan percaya diri.",
            "foto_url": "https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&q=80&w=150"
        },
        {
            "nama": "Dr. KH. Said Aqil, M.A.",
            "role": "Tokoh Pendidikan Islam",
            "pesan": "Model pendidikan di sini sangat relevan dengan tantangan zaman. Menyatukan keluhuran akhlak pesantren dengan kemajuan sains modern adalah kunci melahirkan cendekiawan muslim masa depan.",
            "foto_url": "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&q=80&w=150"
        }
    ]

    for t in testimonials:
        Testimoni.objects.get_or_create(
            nama=t["nama"],
            defaults={"role": t["role"], "pesan": t["pesan"], "foto_url": t["foto_url"]}
        )

    print("Seeding completed successfully!")

if __name__ == "__main__":
    seed_data()
