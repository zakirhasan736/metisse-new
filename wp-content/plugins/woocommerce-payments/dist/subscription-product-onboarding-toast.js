(()=>{var t={};t.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"==typeof window)return window}}(),(()=>{var r;t.g.importScripts&&(r=t.g.location+"");var o=t.g.document;if(!r&&o&&(o.currentScript&&(r=o.currentScript.src),!r)){var e=o.getElementsByTagName("script");e.length&&(r=e[e.length-1].src)}if(!r)throw new Error("Automatic publicPath is not supported in this browser");r=r.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),t.p=r})(),t.p=window.wcpayAssets.url,(()=>{"use strict";const t=window.wp.data,r=window.wp.element,o=window.wp.plugins,e=window.wp.url,n=window.wp.i18n,{pluginScope:i}=window.wcpaySubscriptionProductOnboardingToast;(0,o.registerPlugin)("wcpay-subscription-product-onboarding-toast",{icon:null,render:()=>{const{createInfoNotice:o}=(0,t.useDispatch)("core/notices");return(0,r.useEffect)((()=>{var t;null!==(t=window)&&void 0!==t&&t.history&&window.history.replaceState(null,null,(0,e.removeQueryArgs)(window.location.href,"wcpay-subscriptions-onboarded")),o((0,n.sprintf)((0,n.__)("Thank you for setting up %s! We’ve published your first subscription product.","woocommerce-payments"),"WooPayments"))}),[o]),null},scope:i})})()})();