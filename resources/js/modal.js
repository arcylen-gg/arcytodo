'use strict';

class Modal {

	constructor() {
		this.listeners();
    }
    
    listeners() {
        setTimeout(function() {
            const triggers = document.getElementsByClassName('delete-modal');

            Object.keys(triggers).forEach(el => {
                let postId = triggers[el].getAttribute('post-id');
                triggers[el].onclick = function(ele) {
                    document.getElementById('form-delete').setAttribute('action', '/post/'+ postId);
                }
            });
        }, 100);
    }

}

new Modal();
