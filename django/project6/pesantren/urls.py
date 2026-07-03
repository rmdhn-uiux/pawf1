from django.urls import path
from . import views

urlpatterns = [
    path('', views.landing_page, name='landing_page'),
    path('kirim-pesan/', views.kirim_pesan, name='kirim_pesan'),
    path('daftar-santri/', views.daftar_santri, name='daftar_santri'),
]
