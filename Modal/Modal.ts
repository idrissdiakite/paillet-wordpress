interface ConstructorActivityModal {
  $container: Element
}

class ActivityModal {
  $container: Element
  $images: NodeList
  $buttons: NodeList
  $closeBtns: NodeList
  $arrowRight: HTMLElement
  $arrowLeft: HTMLElement
  currentSlide: number

  constructor(props: ConstructorActivityModal) {

    this.$container = props.$container
    this.$buttons = this.$container.querySelectorAll('.grid-card__button')
    this.$closeBtns = this.$container.querySelectorAll('.grid-card__modal--cross')
    this.$arrowRight = this.$container.querySelector('.arrow-right')
    this.$arrowLeft = this.$container.querySelector('.arrow-left')
    this.currentSlide = 0

    this.init()
  }

  init() {

    this.bindEvents()
  }

  bindEvents() {
    this.$buttons.forEach(($button) => {
      $button.addEventListener('click', (e: any) => {
          const modal = e.currentTarget.parentElement.parentElement.children[2];
          modal.classList.add('active')
          this.updateSlider(modal)
      })
    })

    this.$closeBtns.forEach(($button) => {
      $button.addEventListener('click', (e: any) => {
        const modal = e.currentTarget.parentElement.parentElement.parentElement.parentElement.parentElement
        modal.classList.remove('active')
        this.currentSlide = 0
      })
    })
  }

  updateSlider(modal: any) {
    const images = modal.querySelectorAll('.activity-slideshow--image')
    const numberOfImages = images.length - 1

    if(this.currentSlide < 0) {
      this.currentSlide = numberOfImages
    } else if(this.currentSlide > numberOfImages) {
      this.currentSlide = 0
    }

    const arrowLeft = modal.querySelector('.arrow-left')
    const arrowRight = modal.querySelector('.arrow-right')

    arrowRight.addEventListener('click', (e: any) => {
      images[this.currentSlide].classList.remove('active')
      this.currentSlide++

      if(this.currentSlide > numberOfImages) {
        this.currentSlide = 0
      }

      images[this.currentSlide].classList.add('active')
    })

    arrowLeft.addEventListener('click', () => {
      images[this.currentSlide].classList.remove('active')
      this.currentSlide--

      if(this.currentSlide < 0) {
        this.currentSlide = numberOfImages
      }

      images[this.currentSlide].classList.add('active')
    })
  }
}