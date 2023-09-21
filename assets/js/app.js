const inputFile = document.querySelector(".picture__input");

const pictureImage = document.querySelector(".picture__image");

inputFile.addEventListener("change", (e) => {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
    const reader = new FileReader();

    reader.addEventListener("load", function (e) {
      const readerTarget = e.target;
      criarImagem(readerTarget.result);
      
    });
    reader.readAsDataURL(file);
    
  } else {
    criarImagem("./assets/img/Upload.png");
  }
});
function criarImagem(srcImagem) {
  const img = document.createElement("img");

  img.src = srcImagem;
  img.classList.add("picture__img");
  pictureImage.innerHTML = "";
  pictureImage.appendChild(img);

  const input = document.querySelector('.picture__input-manda-url')
  input.value = img.src
}