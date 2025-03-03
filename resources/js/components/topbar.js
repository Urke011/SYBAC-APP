export default () => ({
  isOpen: false,
  init() {
    console.log('hello from the topbar', this.isOpen);
  },
  toggle() {
    this.isOpen = !this.isOpen
  }
})
