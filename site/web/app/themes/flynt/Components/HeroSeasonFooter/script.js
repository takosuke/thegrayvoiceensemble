import $ from 'jquery'

class HeroSeasonFooter extends window.HTMLDivElement {
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

window.customElements.define('flynt-hero-season-footer', HeroSeasonFooter, {extends: 'div'})
