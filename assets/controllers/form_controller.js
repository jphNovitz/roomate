import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {

    static targets = [ 'show', 'form' ]
    connect() {
        console.log('trigger works !')
    }

    toggle() {
        // console.log(this.showTarget !== undefined)
        this.showTarget.classList.toggle("opacity-0")
        this.showTarget.classList.toggle("-ml-96")
        this.formTarget.classList.toggle("opacity-0")
        // if (this.mobileTarget !== undefined){
        //     this.navTarget.classList.toggle("-mt-[50vh]")
        // }
    }
}