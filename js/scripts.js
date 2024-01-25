window.onload =(){
  let canvas = new Signature("#Signature")

  document.querySelector("effacer").addEventListener("click". (e) =>{
    e.preventDefault()
    canvas.effacer()
  })

  document.querySelector("enregistrer").addEventListener("click". (e) =>{
    e.preventDefault()
    canvas.genererImage()
  })
}
