import $ from 'jquery'

class BlockSeasonYearsList extends window.HTMLDivElement {
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

window.customElements.define('flynt-block-season-years-list', BlockSeasonYearsList, {extends: 'div'})
