interface ConstructorModal {
  $container: Element
}

class Modal {
  $container: Element
  $images: NodeList
  $buttons: NodeList
  $closeBtns: NodeList
  $arrowRight: HTMLElement
  $arrowLeft: HTMLElement
  currentSlide: number
  $dots: NodeList
  isClicked: boolean

  constructor(props: ConstructorModal) {

    this.$container = props.$container
    this.$buttons = this.$container.querySelectorAll('.global-mansory__zoom')
    this.$closeBtns = this.$container.querySelectorAll('.global-mansory__modal--cross')
    this.$arrowRight = this.$container.querySelector('.arrow-right')
    this.$arrowLeft = this.$container.querySelector('.arrow-left')
    this.currentSlide = 0
    this.isClicked = false

    this.init()
  }

  init() {

    this.bindEvents()
  }

  bindEvents() {

    this.$buttons.forEach(($button) => {
      $button.addEventListener('click', (e: any) => {
          const modal = e.currentTarget.parentElement.children[4]
          modal.classList.add('active')
          this.updateSlider(modal)
      })
    })

    this.$closeBtns.forEach(($button) => {
      $button.addEventListener('click', (e: any) => {
        const modal = e.currentTarget.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement
        modal.classList.remove('active')
        this.currentSlide = 0
      })
    })
  }

  updateSlider(modal: any) {
    const images = modal.querySelectorAll('.global-mansory__modal--image')
    const numberOfImages = images.length - 1
    const dots = modal.querySelectorAll('.global-mansory__modal--dots ul li')

    dots[this.currentSlide].classList.add('active')

    if(this.currentSlide < 0) {
      this.currentSlide = numberOfImages
    } else if(this.currentSlide > numberOfImages) {
      this.currentSlide = 0
    }

    const arrowLeft = modal.querySelector('.arrow-left')
    const arrowRight = modal.querySelector('.arrow-right')

    arrowRight.addEventListener('click', (e: any) => {
      images[this.currentSlide].classList.remove('active')
      dots[this.currentSlide].classList.remove('active')
      this.currentSlide++

      if(this.currentSlide > numberOfImages) {
        this.currentSlide = 0
      }

      images[this.currentSlide].classList.add('active')
      dots[this.currentSlide].classList.add('active')
    })

    arrowLeft.addEventListener('click', () => {
      images[this.currentSlide].classList.remove('active')
      dots[this.currentSlide].classList.remove('active')
      this.currentSlide--

      if(this.currentSlide < 0) {
        this.currentSlide = numberOfImages
      }

      images[this.currentSlide].classList.add('active')
      dots[this.currentSlide].classList.add('active')
    })

    dots.forEach((dot: any) => {
      dot.addEventListener('click', (e: any) => {
          const target = e.target
          let index = parseInt((target as Element).getAttribute('data-index'))

          if(index != this.currentSlide) {
            images[this.currentSlide].classList.remove('active')
            dots[this.currentSlide].classList.remove('active')
            this.currentSlide = index
            images[this.currentSlide].classList.add('active')
            dots[this.currentSlide].classList.add('active')
          }
      })
    })
  }
}