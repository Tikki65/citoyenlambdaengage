class Signature{
  constructor(canvas){
    this.canvas = document.querySelector(canvas)
    this.ctx = this.canvas.getContext("2d")
    this.ctx.strokeStyle = "blue"
    this.ctx.lineWidth = 2
  }

}
