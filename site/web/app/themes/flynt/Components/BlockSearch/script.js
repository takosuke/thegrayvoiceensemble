import $ from 'jquery'
import 'svgxuse';

class BlockSearch extends window.HTMLDivElement {
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

window.customElements.define('flynt-block-search', BlockSearch, {extends: 'div'})
