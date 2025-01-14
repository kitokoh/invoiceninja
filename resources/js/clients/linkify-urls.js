/**
 * Africa Novatech (https://africanovatech.com)
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2021. Africa Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license 
 */

const linkifyUrls = require('linkify-urls');

document
    .querySelectorAll('[data-ref=entity-terms]')
    .forEach((text) => {

        if (linkifyUrls === 'function') {

            text.innerHTML = linkifyUrls(text.innerText, {
                attributes: {target: '_blank', class: 'text-primary'}
            });

        }

    });
