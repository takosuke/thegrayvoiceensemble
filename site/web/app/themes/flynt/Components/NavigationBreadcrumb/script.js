import $ from 'jquery'

class NavigationBreadcrumb extends window.HTMLDivElement {
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

window.customElements.define('flynt-navigation-breadcrumb', NavigationBreadcrumb, {extends: 'div'})
