import $ from 'jquery'

class BlockTestimonial extends window.HTMLDivElement {
  constructor (self) {
    self = super(self)
    self.$ = $(self)
    self.resolveElements()
    return self
  }

  resolveElements () {
  }

  connectedCallback () {
  }
}

window.customElements.define('flynt-block-testimonial', BlockTestimonial, {extends: 'div'})
