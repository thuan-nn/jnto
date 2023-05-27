const findByName = (name) => {
  const value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
  return value ? value[2] : null;
};

const setCookie = (key, value, exdays) => {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*1000));
  const expires = "expires="+ d.toUTCString();
  document.cookie = key + "=" + value + ";" + expires + ";path=/";
}

const removeCookie = (key) => {
  document.cookie =  key + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT'
}

export const Cookie = {findByName, setCookie, removeCookie};
