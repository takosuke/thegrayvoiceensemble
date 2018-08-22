import $ from 'jquery'
import 'svgxuse';

class NewsDashboard extends window.HTMLDivElement {
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

window.customElements.define('flynt-block-twitter', NewsDashboard, {extends: 'div'})
