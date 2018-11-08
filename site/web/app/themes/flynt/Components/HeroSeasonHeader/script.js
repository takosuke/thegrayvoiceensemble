import $ from 'jquery'

class HeroSeasonHeader extends window.HTMLDivElement {
  constructor (self) {
    self = super(self)
    self.$ = $(self)
    self.resolveElements()
    return self
  }

  resolveElements () {
    this.$video = $(".video", this)
    this.$exitVideo = $(".exitVideo", this)
  }

  connectedCallback () {
    this.ShowVideo()
    this.HideVideo()
  }
  ShowVideo = () => {
    this.$video.on('click', function(e) {
      $(".video").prev(".videoWrapper").css("display", "flex")
    })
  }
  HideVideo = () => {
    this.$exitVideo.on('click', function(e) {
      $(".video").prev(".videoWrapper").css("display", "none")
    })
  }
}

window.customElements.define('flynt-hero-season-header', HeroSeasonHeader, {extends: 'div'})
