interface ConstructorLittleSlideshow {
  $container: Element
}

class LittleSlideshow {
  $container: Element
  $images: any
  $currentIndex: number
  $lastIndex: number
  $lastIndexVisible: number
  $arrowRight: HTMLElement
  $arrowLeft: HTMLElement
  currentSlide: number
  isClicked: boolean
  

  constructor(props: ConstructorLittleSlideshow) {

    this.$container = props.$container
    this.$images = this.$container.querySelectorAll('.global_little_images_slideshow__image')
    this.$currentIndex = 0
    this.$lastIndex = this.$images.length -1
    this.$lastIndexVisible = 3
    this.$arrowRight = this.$container.querySelector('.arrow-right')
    this.$arrowLeft = this.$container.querySelector('.arrow-left')
    this.currentSlide = 0

    this.init()
  }

  init() {

    this.bindEvents()
  }

  bindEvents() {

    this.$arrowRight.addEventListener('click', (e) => {
      if(this.$lastIndexVisible != this.$lastIndex) {
        this.$lastIndexVisible++
        this.$images[this.$currentIndex].classList.remove('active')
        this.$images[this.$lastIndexVisible].classList.add('active')
        this.$currentIndex++
      }
      else {
        e.preventDefault
      }
    })

    this.$arrowLeft.addEventListener('click', (e) => {
      if(this.$currentIndex == 0) {
        e.preventDefault
      }
      else {
        this.$currentIndex--
        this.$images[this.$currentIndex].classList.add('active')
        this.$images[this.$lastIndexVisible].classList.remove('active')
        this.$lastIndexVisible--
      }
    })
  }
}
