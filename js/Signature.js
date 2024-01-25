class Signature{
  constructor(canvas){
    this.sign = false
    this.prevX = 0
    this.prevY = 0
    
    this.canvas = document.querySelector(canvas)
    this.ctx = this.canvas.getContext("2d")
    this.ctx.strokeStyle = "blue"
    this.ctx.lineWidth = 2

    this.canvas.addEventListener("mousedown", (e) =>{
      //je signe
      this.sign = true

      //je stocke mes coordonnées de départ
      this.prevX = eclientX - this.canvas.offsetLeft
      this.prevY = eclientY - this.canvas.offsetTop
    })

    this.canvas.addEventListener("mousemove", (e) =>{
      //si je signe
      if(this.sign){
        let currX = eclientX - this.canvas.offsetLeft
        let currY = eclientY - this.canvas.offsetTop
        this.draw(this.prevX, this.prevY, currX, currY)
        this.prevX = currX
        this.prevY = currY
      }
    })

    this.canvas.addEventListener("mouseup", () =>{
      this.sign = false
    })

    this.canvas.addEventListener("mouseout", () =>{
      this.sign = false
    })
  }
draw(depX, depY, destX, destY){
  this.ctx.beginPath()
  this.ctx.moveTo(depX, depY)
  this.ctx.lineTo(destX, destY)
  this.ctx.closePath()
  this.ctx.stroke()
}
  effacer(){
  this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height)
}
