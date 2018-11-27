import $ from 'jquery'

class GridHomeLayout extends window.HTMLDivElement {
  constructor (self) {
    self = super(self)
    self.$ = $(self)
    self.resolveElements()
    return self
  }

  resolveElements () {
    this.$multi = $('.multi', this)
    this.$show = $('.show', this)
  }

  connectedCallback () {
    this.ShowMultiyYears()
  }

  ShowMultiyYears = () => {
    this.$show.on('click', function(e) {
      $(this).parent('.wrapper').next('.multi').slideToggle()
      e.preventDefault()
    })
  }
}

window.customElements.define('flynt-grid-home-layout', GridHomeLayout, {extends: 'div'})
