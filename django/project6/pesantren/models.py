from django.db import models

class ProgramUnggulan(models.Model):
    nama = models.CharField(max_length=100)
    deskripsi = models.TextField()
    icon = models.CharField(max_length=50, help_text="FontAwesome icon class name (e.g., fa-book-quran, fa-laptop-code)")
    urutan = models.IntegerField(default=0)

    class Meta:
        verbose_name_plural = "Program Unggulan"
        ordering = ['urutan', 'nama']

    def __str__(self):
        return self.nama

class Fasilitas(models.Model):
    nama = models.CharField(max_length=100)
    deskripsi = models.TextField()
    icon = models.CharField(max_length=50, default="fa-building", help_text="FontAwesome icon class name (e.g., fa-mosque, fa-hotel)")
    urutan = models.IntegerField(default=0)

    class Meta:
        verbose_name_plural = "Fasilitas"
        ordering = ['urutan', 'nama']

    def __str__(self):
        return self.nama

class Testimoni(models.Model):
    nama = models.CharField(max_length=100)
    role = models.CharField(max_length=100, help_text="e.g., Wali Santri, Alumni, Tokoh Masyarakat")
    pesan = models.TextField()
    foto_url = models.URLField(blank=True, null=True, help_text="Optional avatar image URL")
    created_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        verbose_name_plural = "Testimoni"
        ordering = ['-created_at']

    def __str__(self):
        return f"{self.nama} ({self.role})"

class PesanKontak(models.Model):
    SOURCE_CHOICES = [
        ('form', 'Form Web'),
        ('wa', 'WhatsApp'),
    ]

    nama = models.CharField(max_length=100, blank=True, null=True)
    email = models.EmailField(blank=True, null=True)
    telepon = models.CharField(max_length=20)
    subjek = models.CharField(max_length=150, blank=True, null=True)
    pesan = models.TextField()
    wa_id = models.CharField(max_length=100, blank=True, null=True, db_index=True, verbose_name="WA ID / JID")
    source = models.CharField(max_length=10, choices=SOURCE_CHOICES, default='form')
    created_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        verbose_name_plural = "Pesan Kontak"
        ordering = ['-created_at']

    def __str__(self):
        if self.source == 'wa':
            return f"[WA] {self.telepon} - {self.pesan[:50]}"
        return f"{self.nama or '(anonim)'} - {self.subjek or '(tanpa subjek)'}"

class PendaftaranSantri(models.Model):
    CHOICES_KELAMIN = [
        ('L', 'Laki-laki'),
        ('P', 'Perempuan'),
    ]
    JENJANG_CHOICES = [
        ('MTS', 'Madrasah Tsanawiyah (MTs)'),
        ('MA', 'Madrasah Aliyah (MA)'),
    ]
    STATUS_CHOICES = [
        ('PENDING', 'Menunggu Review'),
        ('ACCEPTED', 'Diterima'),
        ('REJECTED', 'Ditolak'),
    ]
    
    nama_lengkap = models.CharField(max_length=150)
    tempat_lahir = models.CharField(max_length=100)
    tanggal_lahir = models.DateField()
    jenis_kelamin = models.CharField(max_length=1, choices=CHOICES_KELAMIN)
    nama_orang_tua = models.CharField(max_length=150)
    nomor_hp = models.CharField(max_length=20)
    alamat = models.TextField()
    program_pilihan = models.CharField(max_length=3, choices=JENJANG_CHOICES, default='MTS', verbose_name="Jenjang")
    status = models.CharField(max_length=10, choices=STATUS_CHOICES, default='PENDING')
    created_at = models.DateTimeField(auto_now_add=True)

    class Meta:
        verbose_name_plural = "Pendaftaran Santri"
        ordering = ['-created_at']

    def __str__(self):
        return f"{self.nama_lengkap} - {self.get_program_pilihan_display()}"

