class Signature{
  constructor(canvas){
    this.sign = false
    this.prevX = 0
    this.prevY = 0
    
    this.canvas = document.querySelector(canvas)
    this.ctx = this.canvas.getContext("2d")
    this.ctx.strokeStyle = "blue"
    this.ctx.lineWidth = 2

    this.canvas.addEventListener("mousedown", (e) =>){
      //je signe
      this.sign = true

      //je stocke mes coordonnées de départ
      this.prevX = eclientX - this.canvas.offsetLeft
      this.prevY = eclientY - this.canvas.offsetTop
    }

    this.canvas.addEventListener("mousemove", (e) =>){
      //si je signe
      if(this.sign){
        let currX = eclientX - this.canvas.offsetLeft
        let currY = eclientY - this.canvas.offsetTop
      }

      //je stocke mes coordonnées de départ
      this.prevX = 
      this.prevY = 
    }                             
  }

}
