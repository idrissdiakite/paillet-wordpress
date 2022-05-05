interface ConstructorScrollbar {
  $container: any
}

class Scrollbar {
  $container: any
  $scrollbar: HTMLElement


  constructor(props: ConstructorScrollbar) {

    this.$container = props.$container
    this.$scrollbar = this.$container.querySelector('.grid-card__modal--scrollbar--progress')


    this.init()
  }

  init() {

    this.bindEvents()
  }

  bindEvents() {
    this.$container.addEventListener('scroll', () => {
      
      let scroll = this.$container.scrollTop / (this.$container.scrollHeight + window.innerHeight)
      let scrollPercent = Math.round(scroll * 100)
    
     this.$scrollbar.style.height = scrollPercent + "%"
      
    })
}
}