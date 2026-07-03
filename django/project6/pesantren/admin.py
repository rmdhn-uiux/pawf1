from django.contrib import admin
from .models import ProgramUnggulan, Fasilitas, Testimoni, PesanKontak, PendaftaranSantri

@admin.register(ProgramUnggulan)
class ProgramUnggulanAdmin(admin.ModelAdmin):
    list_display = ('nama', 'icon', 'urutan')
    search_fields = ('nama', 'deskripsi')
    list_editable = ('urutan',)

@admin.register(Fasilitas)
class FasilitasAdmin(admin.ModelAdmin):
    list_display = ('nama', 'icon', 'urutan')
    search_fields = ('nama', 'deskripsi')
    list_editable = ('urutan',)

@admin.register(Testimoni)
class TestimoniAdmin(admin.ModelAdmin):
    list_display = ('nama', 'role', 'created_at')
    search_fields = ('nama', 'role', 'pesan')
    list_filter = ('created_at',)

@admin.register(PesanKontak)
class PesanKontakAdmin(admin.ModelAdmin):
    list_display = ('nama', 'email', 'subjek', 'created_at')
    search_fields = ('nama', 'email', 'subjek', 'pesan')
    list_filter = ('created_at',)
    readonly_fields = ('nama', 'email', 'telepon', 'subjek', 'pesan', 'created_at')

@admin.register(PendaftaranSantri)
class PendaftaranSantriAdmin(admin.ModelAdmin):
    list_display = ('nama_lengkap', 'program_pilihan', 'nomor_hp', 'status', 'created_at')
    list_filter = ('status', 'program_pilihan', 'created_at')
    search_fields = ('nama_lengkap', 'nama_orang_tua', 'nomor_hp', 'alamat')
    list_editable = ('status',)
    readonly_fields = ('created_at',)

