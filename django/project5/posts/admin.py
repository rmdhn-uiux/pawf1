from django.contrib import admin

#membuat admin post
from .models import Post

admin.site.register(Post)
