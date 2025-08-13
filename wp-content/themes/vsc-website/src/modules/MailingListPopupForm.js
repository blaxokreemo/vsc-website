class MailingListPopupForm {

  // 1. Describe and create/initiate our object
  constructor() {
    this.popupOverlay = document.getElementById('signup-overlay');
    this.openPopupButton = document.getElementById('mailing-list-button');
    this.footerButton = document.getElementById('footer-mailing-list-button');
    this.openPopupLink = document.querySelector('.mailing-list-link');
    this.closePopupButton = document.getElementById('close-button');
    this.events();
  }



  // 2. Add Events
  events() {
    if (this.openPopupButton != null) {
      this.openPopupButton.addEventListener("click", () => this.openPopup());
    }    

    if (this.openPopupLink != null) {
      this.openPopupLink.addEventListener("click", ()=> this.openPopup());
    }
    this.footerButton.addEventListener("click", () => this.openPopup());
    this.closePopupButton.addEventListener("click", () => this.closePopup());

  }

  // 3. Add methods (function, action...)

  openPopup() {
    this.popupOverlay.style.display = 'block';
  }

  closePopup() {
    this.popupOverlay.style.display = "none";
  }

}

export default MailingListPopupForm