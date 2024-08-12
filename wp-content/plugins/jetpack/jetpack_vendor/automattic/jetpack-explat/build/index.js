/*! For license information please see index.js.LICENSE.txt */
(()=>{"use strict";var e={102:(e,t,n)=>{n.d(t,{Z:()=>s});var r=n(275),i=n(196);const o={isEligible:!0};function s(e){const t=(t,n={})=>{const r={...o,...n},[,s]=(0,i.useReducer)((e=>e+1),0),a=(0,i.useRef)(t);if((0,i.useEffect)((()=>{let n=!0;return r.isEligible&&e.loadExperimentAssignment(t).then((()=>{n&&s()})),()=>{n=!1}}),[t,r.isEligible]),t===a.current||a.current.startsWith("explat_test")||e.config.logError({message:"[ExPlat] useExperiment: experimentName should never change between renders!"}),!r.isEligible)return[!1,null];const m=e.dangerouslyGetMaybeLoadedExperimentAssignment(t);return[!m,m]};return{useExperiment:t,Experiment:({defaultExperience:e,treatmentExperience:n,loadingExperience:i,name:o,options:s})=>{const[a,m]=t(o,s);return a?(0,r.jsx)(r.Fragment,{children:i}):m?.variationName?(0,r.jsx)(r.Fragment,{children:n}):(0,r.jsx)(r.Fragment,{children:e})},ProvideExperimentData:({children:e,name:n,options:r})=>{const[i,o]=t(n,r);return e(i,o)}}}},926:(e,t,n)=>{n.d(t,{Hr:()=>l,O8:()=>c});var r=n(765),i=n(784),o=n(667),s=n(181),a=n(939);const m=1e4;Error;function c(e){if("undefined"==typeof window)throw new Error("Running outside of a browser context.");const t={},n=(...t)=>{try{e.logError(...t)}catch(e){}};try{(0,r._U)()}catch(e){n({message:e.message,source:"removeExpiredExperimentAssignments-error"})}return{loadExperimentAssignment:async c=>{try{if(!a.K9(c))throw new Error(`Invalid experimentName: "${c}"`);const n=(0,r.cd)(c);if(n&&i.fh(n))return n;void 0===t[c]&&(t[c]=(t=>s.I1((async()=>{const n=await o.pC(e,t);return(0,r.NV)(n),n})))(c));let l=m;Math.random()>.5&&(l=5e3);const p=await s.GR(t[c](),l);if(!p)throw new Error("Could not fetch ExperimentAssignment");return p}catch(e){n({message:e.message,experimentName:c,source:"loadExperimentAssignment-initialError"})}try{const e=(0,r.cd)(c);if(e)return e;const t=(0,i.pl)(c);return(0,r.NV)(t),t}catch(e){return n({message:e.message,experimentName:c,source:"loadExperimentAssignment-fallbackError"}),(0,i.pl)(c)}},dangerouslyGetExperimentAssignment:t=>{try{if(!a.K9(t))throw new Error(`Invalid experimentName: ${t}`);const i=(0,r.cd)(t);if(!i)throw new Error("Trying to dangerously get an ExperimentAssignment that hasn't loaded.");return e.isDevelopmentMode&&i&&s.qS()-i.retrievedTimestamp<1e3&&n({message:"Warning: Trying to dangerously get an ExperimentAssignment too soon after loading it.",experimentName:t,source:"dangerouslyGetExperimentAssignment"}),i}catch(r){return e.isDevelopmentMode&&n({message:r.message,experimentName:t,source:"dangerouslyGetExperimentAssignment-error"}),(0,i.pl)(t)}},dangerouslyGetMaybeLoadedExperimentAssignment:t=>{try{if(!a.K9(t))throw new Error(`Invalid experimentName: ${t}`);const e=(0,r.cd)(t);return e||null}catch(r){return e.isDevelopmentMode&&n({message:r.message,experimentName:t,source:"dangerouslyGetMaybeLoadedExperimentAssignment-error"}),(0,i.pl)(t)}},config:e}}function l(e){return{loadExperimentAssignment:async t=>(e.logError({message:"Attempting to load ExperimentAssignment in SSR context",experimentName:t}),(0,i.pl)(t)),dangerouslyGetExperimentAssignment:t=>(e.logError({message:"Attempting to dangerously get ExperimentAssignment in SSR context",experimentName:t}),(0,i.pl)(t)),dangerouslyGetMaybeLoadedExperimentAssignment:t=>(e.logError({message:"Attempting to dangerously get ExperimentAssignment in SSR context",experimentName:t}),(0,i.pl)(t)),config:e}}},105:(e,t,n)=>{n.d(t,{O:()=>i});var r=n(926);const i="undefined"==typeof window?r.Hr:r.O8},765:(e,t,n)=>{n.d(t,{NV:()=>m,_U:()=>d,cd:()=>c});var r=n(784),i=n(257),o=n(939);const s="explat-experiment-",a=e=>`${s}-${e}`;function m(e){o.mm(e);const t=c(e.experimentName);if(t&&e.retrievedTimestamp<t.retrievedTimestamp)throw new Error("Trying to store an older experiment assignment than is present in the store, likely a race condition.");i.Z.setItem(a(e.experimentName),JSON.stringify(e))}function c(e){const t=i.Z.getItem(a(e));if(t)return o.mm(JSON.parse(t))}const l=e=>[...Array(e).keys()];function p(e){return e.startsWith(s)}function u(e){return e.slice(s.length+1)}function d(){l(i.Z.length).map((e=>i.Z.key(e))).filter(p).map(u).filter((e=>{try{if(r.fh(c(e)))return!1}catch(e){}return!0})).map(a).map((e=>i.Z.removeItem(e)))}},784:(e,t,n)=>{n.d(t,{fh:()=>i,gY:()=>o,pl:()=>s});var r=n(181);function i(e){return r.qS()<e.ttl*r.s9+e.retrievedTimestamp}const o=60,s=(e,t=o)=>({experimentName:e,variationName:null,retrievedTimestamp:r.qS(),ttl:Math.max(o,t),isFallbackExperimentAssignment:!0})},257:(e,t,n)=>{n.d(t,{Z:()=>i});let r={_data:{},setItem:function(e,t){this._data[e]=t},getItem:function(e){return this._data.hasOwnProperty(e)?this._data[e]:null},removeItem:function(e){delete this._data[e]},clear:function(){this._data={}},get length(){return Object.keys(this._data).length},key:function(e){const t=Object.keys(this._data);return e in t?t[e]:null}};try{window.localStorage&&(r=window.localStorage)}catch(e){}const i=r},667:(e,t,n)=>{n.d(t,{pC:()=>p});var r=n(784),i=n(257),o=n(181),s=n(939);function a(e){if(function(e){return(0,s.Kn)(e)&&(0,s.Kn)(e.variations)&&"number"==typeof e.ttl&&0<e.ttl}(e))return e;throw new Error("Invalid FetchExperimentAssignmentResponse")}const m="explat-last-anon-id",c="explat-last-anon-id-retrieval-time",l=async e=>{const t=await e();if(t)return i.Z.setItem(m,t),i.Z.setItem(c,String((0,o.qS)())),t;const n=i.Z.getItem(m),r=i.Z.getItem(c);return n&&r&&(0,o.qS)()-parseInt(r,10)<864e5?n:null};async function p(e,t){const n=(0,o.qS)(),{variations:i,ttl:m}=a(await e.fetchExperimentAssignment({anonId:await l(e.getAnonId),experimentName:t})),c=Math.max(r.gY,m),p=Object.entries(i).map((([e,t])=>({experimentName:e,variationName:t,retrievedTimestamp:n,ttl:c}))).map(s.mm);if(p.length>1)throw new Error("Received multiple experiment assignments while trying to fetch exactly one.");if(0===p.length)return r.pl(t,c);const u=p[0];if(u.experimentName!==t)throw new Error("Newly fetched ExperimentAssignment's experiment name does not match request.");if(!r.fh(u))throw new Error("Newly fetched experiment isn't alive.");return u}},181:(e,t,n)=>{n.d(t,{GR:()=>s,I1:()=>a,qS:()=>o,s9:()=>r});const r=1e3;let i=Date.now();function o(){const e=Date.now();return i=i<e?e:i+1,i}function s(e,t){return Promise.race([e,new Promise(((e,n)=>setTimeout((()=>n(new Error(`Promise has timed-out after ${t}ms.`))),t)))])}function a(e){let t=null;return()=>(t||(t=e().finally((()=>{t=null}))),t)}},939:(e,t,n)=>{function r(e){return"object"==typeof e&&null!==e}function i(e){return"string"==typeof e&&""!==e&&/^[a-z0-9_]*$/.test(e)}function o(e){if(!function(e){return r(e)&&i(e.experimentName)&&(i(e.variationName)||null===e.variationName)&&"number"==typeof e.retrievedTimestamp&&"number"==typeof e.ttl&&0!==e.ttl}(e))throw new Error("Invalid ExperimentAssignment");return e}n.d(t,{K9:()=>i,Kn:()=>r,mm:()=>o})},990:(e,t)=>{t.parse=function(e,t){if("string"!=typeof e)throw new TypeError("argument str must be a string");for(var r={},o=t||{},a=e.split(i),m=o.decode||n,c=0;c<a.length;c++){var l=a[c],p=l.indexOf("=");if(!(p<0)){var u=l.substr(0,p).trim(),d=l.substr(++p,l.length).trim();'"'==d[0]&&(d=d.slice(1,-1)),null==r[u]&&(r[u]=s(d,m))}}return r},t.serialize=function(e,t,n){var i=n||{},s=i.encode||r;if("function"!=typeof s)throw new TypeError("option encode is invalid");if(!o.test(e))throw new TypeError("argument name is invalid");var a=s(t);if(a&&!o.test(a))throw new TypeError("argument val is invalid");var m=e+"="+a;if(null!=i.maxAge){var c=i.maxAge-0;if(isNaN(c)||!isFinite(c))throw new TypeError("option maxAge is invalid");m+="; Max-Age="+Math.floor(c)}if(i.domain){if(!o.test(i.domain))throw new TypeError("option domain is invalid");m+="; Domain="+i.domain}if(i.path){if(!o.test(i.path))throw new TypeError("option path is invalid");m+="; Path="+i.path}if(i.expires){if("function"!=typeof i.expires.toUTCString)throw new TypeError("option expires is invalid");m+="; Expires="+i.expires.toUTCString()}i.httpOnly&&(m+="; HttpOnly");i.secure&&(m+="; Secure");if(i.sameSite){switch("string"==typeof i.sameSite?i.sameSite.toLowerCase():i.sameSite){case!0:m+="; SameSite=Strict";break;case"lax":m+="; SameSite=Lax";break;case"strict":m+="; SameSite=Strict";break;case"none":m+="; SameSite=None";break;default:throw new TypeError("option sameSite is invalid")}}return m};var n=decodeURIComponent,r=encodeURIComponent,i=/; */,o=/^[\u0009\u0020-\u007e\u0080-\u00ff]+$/;function s(e,t){try{return t(e)}catch(t){return e}}},561:(e,t,n)=>{var r=n(196),i=Symbol.for("react.element"),o=Symbol.for("react.fragment"),s=Object.prototype.hasOwnProperty,a=r.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,m={key:!0,ref:!0,__self:!0,__source:!0};function c(e,t,n){var r,o={},c=null,l=null;for(r in void 0!==n&&(c=""+n),void 0!==t.key&&(c=""+t.key),void 0!==t.ref&&(l=t.ref),t)s.call(t,r)&&!m.hasOwnProperty(r)&&(o[r]=t[r]);if(e&&e.defaultProps)for(r in t=e.defaultProps)void 0===o[r]&&(o[r]=t[r]);return{$$typeof:i,type:e,key:c,ref:l,props:o,_owner:a.current}}t.Fragment=o,t.jsx=c},275:(e,t,n)=>{e.exports=n(561)},180:(e,t,n)=>{n.d(t,{Iq:()=>o,L7:()=>s});var r=n(990);let i=null;const o=async()=>{let e=0;return i=new Promise((t=>{const n=()=>{const i=r.parse(document.cookie).tk_ai||null;"string"!=typeof i||""===i?99<=e?t(null):(e+=1,setTimeout(n,50)):t(i)};n()})),i},s=async()=>await i},622:(e,t,n)=>{n.d(t,{n:()=>a,u:()=>m});var r=n(989),i=n.n(r),o=n(483);const s=(e=!1)=>async({experimentName:t,anonId:n})=>{if(!n)throw new Error("Tracking is disabled, can't fetch experimentAssignment");const r={experiment_name:t,anon_id:n??void 0,as_connected_user:e},s=(0,o.addQueryArgs)("jetpack/v4/explat/assignments",r);return await i()({path:s})},a=s(!1),m=s(!0)},210:(e,t,n)=>{n.d(t,{H:()=>i});var r=n(79);const i=e=>{const t=e=>{r.b&&console.error("[ExPlat] Unable to send error to server:",e)};try{const{message:n,...i}=e,o={message:n,properties:{...i,context:"explat",explat_client:"jetpack"}};if(r.b)console.error("[ExPlat] ",e.message,e);else{const e=new window.FormData;e.append("error",JSON.stringify(o)),window.fetch("https://public-api.wordpress.com/rest/v1.1/js-error",{method:"POST",body:e}).catch(t)}}catch(e){t(e)}}},79:(e,t,n)=>{n.d(t,{b:()=>r});const r=!1},196:e=>{e.exports=window.React},989:e=>{e.exports=window.wp.apiFetch},483:e=>{e.exports=window.wp.url}},t={};function n(r){var i=t[r];if(void 0!==i)return i.exports;var o=t[r]={exports:{}};return e[r](o,o.exports,n),o.exports}n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var r in t)n.o(t,r)&&!n.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:t[r]})},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e=n(105),t=n(102),r=n(180),i=n(622),o=n(210),s=n(79);(0,r.Iq)().catch((e=>(0,o.H)({message:e.message})));const a=(0,e.O)({fetchExperimentAssignment:i.n,getAnonId:r.L7,logError:o.H,isDevelopmentMode:s.b}),{loadExperimentAssignment:m,dangerouslyGetExperimentAssignment:c}=a,{useExperiment:l,Experiment:p,ProvideExperimentData:u}=(0,t.Z)(a),d=(0,e.O)({fetchExperimentAssignment:i.u,getAnonId:r.L7,logError:o.H,isDevelopmentMode:s.b}),{loadExperimentAssignment:g,dangerouslyGetExperimentAssignment:f}=d,{useExperiment:x,Experiment:h,ProvideExperimentData:y}=(0,t.Z)(d)})()})();