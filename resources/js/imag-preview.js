//immagine placeholder
const placeholder = 'https://us.123rf.com/450wm/mathier/mathier1905/mathier190500002/134557216-nessuna-immagine-in-miniatura-segnaposto-per-forum-blog-e-siti-web.jpg';

const imagInput = document.getElementById('image-input');
const imagPreview = document.getElementById('image-preview');

imagInput.addEventListener('change', () => {
    if (imagInput.files && imagInput.files[0]) {
        let reader = new FileReader();
        reader.readAsDataURL(imagInput.files[0]);

        reader.onload = (e) => {
            imagPreview.setAttribute('src', e.target.result);
        }
    } else {
        return imagPreview.setAttribute('src', placeholder);
    }
})




