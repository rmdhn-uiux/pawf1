from django.db import models

#membuat post model
class Post(models.Model):
	text = models.TextField()

	def __str__(self):
		return self.text[:50]
