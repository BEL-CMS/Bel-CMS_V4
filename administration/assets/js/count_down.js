// >>---------------------------------------- //Count-down js Start// ---------------------------------------- <<
window.addEventListener('load', () => {
  const countDownDate = new Date('2026-12-31T23:59:59').getTime();

  const updateCountdown = () => {
    const now = Date.now();
    const distance = countDownDate - now;

    if (distance < 0) {
      clearInterval(interval);
      document.querySelectorAll('.timer').forEach(timer => {
        timer.textContent = 'EXPIRED';
      });
      return;
    }

    const time = {
      days: Math.floor(distance / (1000 * 60 * 60 * 24)),
      hours: Math.floor((distance / (1000 * 60 * 60)) % 24),
      minutes: Math.floor((distance / (1000 * 60)) % 60),
      seconds: Math.floor((distance / 1000) % 60),
    };

    document.querySelectorAll('.timer').forEach(timer => {
      Object.entries(time).forEach(([key, value]) => {
        const el = timer.querySelector(`.${key}`);
        if (el) el.textContent = value;
      });
    });
  };

  updateCountdown(); // run immediately
  const interval = setInterval(updateCountdown, 1000);
});
// >> ---------------------------------------- //Count-down js End// ---------------------------------------- <<
