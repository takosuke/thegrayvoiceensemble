import $ from 'jquery'
import 'file-loader?name=vendor/slick.js!slick-carousel/slick/slick.min'
import 'file-loader?name=vendor/slick.css!csso-loader!slick-carousel/slick/slick.css'

function importSlickFonts (fontName) { // eslint-disable-line no-unused-vars
  require(`file-loader?name=vendor/slick/[name].[ext]!slick-carousel/slick/fonts/${fontName}`)
}

import slickConfiguration from './sliderConfiguration.js'

class SliderPosts extends window.HTMLDivElement {
  constructor (self) {
    self = super(self)
    self.$ = $(self)
    self.sliderInitialised = false
    self.isMobile = false
    self.resolveElements()
    return self
  }

  resolveElements () {
    this.$sliderPosts = $('.sliderPosts', this)
    this.$slideContent = $('.slideContent', this)
    this.$mediaSlides = $('.sliderPosts-slides', this)
    this.$slides = $('.sliderPosts-slide', this)
  }

  connectedCallback () {
    this.setupSlider()
  }

  setupSlider = () => {
    if (this.$slides.length > 1) {
      this.$.on('init', this.$mediaSlides.selector, this.slickInit)
      this.$mediaSlides.slick(slickConfiguration)
    } else {
      this.$sliderPosts.removeClass('sliderPosts-isHidden')
    }
  }

  slickInit = () => {
    this.$sliderPosts.removeClass('sliderPosts-isHidden')
  }
}

window.customElements.define('flynt-slider-posts', SliderPosts, {extends: 'div'})
