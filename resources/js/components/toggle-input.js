export default (initState = false) => {
  console.log(typeof initState);
  return ({
    active: initState,
    toggle() {
      this.active = !this.active
    }
  })
}
