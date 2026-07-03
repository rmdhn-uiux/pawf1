from django.shortcuts import render, redirect
from django.urls import reverse
from django.contrib import messages
from .models import ProgramUnggulan, Fasilitas, Testimoni
from .forms import PesanKontakForm, PendaftaranSantriForm

def landing_page(request):
    programs = ProgramUnggulan.objects.all()
    facilities = Fasilitas.objects.all()
    testimonials = Testimoni.objects.all()
    
    # We pass the forms to the template
    # If the user redirects back due to an error, we want to show validation errors.
    # To keep it simple, we check if there are forms in the session (optional) or just use fresh forms.
    contact_form = PesanKontakForm()
    registration_form = PendaftaranSantriForm()
    
    context = {
        'programs': programs,
        'facilities': facilities,
        'testimonials': testimonials,
        'contact_form': contact_form,
        'registration_form': registration_form,
    }
    return render(request, 'pesantren/landing.html', context)

def kirim_pesan(request):
    if request.method == 'POST':
        form = PesanKontakForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.')
            return redirect(reverse('landing_page') + '#contact')
        else:
            messages.error(request, 'Gagal mengirim pesan. Silakan periksa kembali input Anda.')
            # To preserve error messages in validation:
            # We can re-render the page with the invalid form
            programs = ProgramUnggulan.objects.all()
            facilities = Fasilitas.objects.all()
            testimonials = Testimoni.objects.all()
            registration_form = PendaftaranSantriForm()
            return render(request, 'pesantren/landing.html', {
                'programs': programs,
                'facilities': facilities,
                'testimonials': testimonials,
                'contact_form': form,
                'registration_form': registration_form,
                'active_tab': 'contact'
            })
    return redirect('landing_page')

def daftar_santri(request):
    if request.method == 'POST':
        form = PendaftaranSantriForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Pendaftaran berhasil dikirim! Silakan simpan halaman ini dan tunggu konfirmasi panitia melalui WhatsApp.')
            return redirect(reverse('landing_page') + '#daftar')
        else:
            messages.error(request, 'Gagal memproses pendaftaran. Mohon koreksi kesalahan pada formulir.')
            # To preserve error messages in validation:
            programs = ProgramUnggulan.objects.all()
            facilities = Fasilitas.objects.all()
            testimonials = Testimoni.objects.all()
            contact_form = PesanKontakForm()
            return render(request, 'pesantren/landing.html', {
                'programs': programs,
                'facilities': facilities,
                'testimonials': testimonials,
                'contact_form': contact_form,
                'registration_form': form,
                'active_tab': 'daftar'
            })
    return redirect('landing_page')
