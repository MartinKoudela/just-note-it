document.addEventListener('DOMContentLoaded', () => {
  const nameSpan = document.getElementById('name');
  const storedName = localStorage.getItem('hello_user');
  if (nameSpan && storedName) {
    nameSpan.textContent = ' ' + storedName;
  }

  const registerInput = document.getElementById('register_name');
  if (registerInput && registerInput.form) {
    registerInput.form.addEventListener('submit', () => {
      const val = registerInput.value.trim();
      if (val) localStorage.setItem('hello_user', val);
    });
  }

  const loginInput = document.getElementById('login_name');
  if (loginInput && loginInput.form) {
    loginInput.form.addEventListener('submit', () => {
      const val = loginInput.value.trim();
      if (val) localStorage.setItem('hello_user', val);
    });
  }
});