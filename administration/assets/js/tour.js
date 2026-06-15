 // >>--------------------------Tour js start-----------------<<
 const tour = new Shepherd.Tour({
  useModalOverlay: true,
  defaultStepOptions: {
    cancelIcon: {
      enabled: true
    },
    classes: 'shepherd-theme-custom',
    scrollTo: {
      behavior: "smooth",
      block: "center"
    },
  }
});

tour.addStep({
  id: 'profile-app-tabs',
  title: 'All Tabs!',
  text: ' Go and cheak Now 👍\n',
  attachTo: {
    element: '#profile-app-tabs',
    on: 'bottom'
  },
  buttons: [
    {text: '< Back', action: tour.back},
    {text: 'Next >',action: tour.next }
  ]
});

 tour.addStep({
   id: 'profile-card',
   title: 'Profile card',
   text: ' Meet You! 👋',
   attachTo: {
     element: '#profile-card',
     on: 'bottom'
   },
   buttons: [
     { text: '< Back', action: tour.back},
     {text: 'Next >',action: tour.next }
   ]
 });

 tour.addStep({
   id: 'about-me',
   title: 'About Me',
   text: ' something details about me!!\n',
   attachTo: {
     element: '#about-me',
     on: 'bottom'
   },
   buttons: [
     { text: '< Back', action: tour.back},
     {text: 'Next >',action: tour.next }
   ]
 });

tour.addStep({
  id: 'featured-stories',
  title: 'Stories !',
  text: ' Beautiful day start with some pictures\n',
  attachTo: {
    element: '#featured-stories',
    on: 'bottom'
  },
  buttons: [
    {text: '< Back', action: tour.back},
    {text: 'Next >',action: tour.next }
  ]
});

tour.addStep({
  id: 'post',
  title: 'Post',
  text: ' Some picture of our post secthion..\n',
  attachTo: {
    element: '#post-box',
    on: 'bottom'
  },
  buttons: [
    { text: '< Back', action: tour.back},
    {text: 'Finish 👍',action: tour.next }
  ]
});


tour.start();

 //  >>--------image js---------<<
 GLightbox({
   touchNavigation: true,
   loop: true,
   width: "90vw",
   height: "90vh",
 });

    // >>---------------------------Tour js end------------------<<
