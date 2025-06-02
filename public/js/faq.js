// faq.js
function accordion(index) {
    return {
        id: index,
        open: false,
        handleClick() {
            this.open = !this.open;
        },
        handleRotate() {
            return this.open ? 'rotate-180' : '';
        },
        handleToggle() {
            return this.open ? 'max-height: 500px;' : 'max-height: 0;';
        }
    };
}
