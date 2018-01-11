# 645-2 Santour

This project has been made by a group of the HES-SO Valais Wallis Student in the context of an android development course.
This project is separated into two parts: a web interface and an android application.
You can find the web interface project here: https://github.com/Centoroma/SanTourWeb

## Getting Started

In order to run this project, you will need to upload this project on your android studio,
•	You can download Xampp for be able to run Apache and MySQL servers : https://www.apachefriends.org/fr/download.html
•	You can download PhpStorm here : https://www.jetbrains.com/phpstorm/download/#section=windows
•	Then connect to the GitHub project : https://github.com/Centoroma/SanTourWeb

## Project Structure

We build this project to follow a standard MVC architecture:
```

SanTourWeb/
├── app
│   ├── controller
│   │   ├── ControllerCategories.php
│   │   ├── ControllerIndex.php
│   │   └── ControllerTracks.php
│   ├── model
│   │   ├── ModelCategories.php
│   │   ├── ModelIndex.php
│   │   └── ModelTracks.php
│   └── view
│       ├── _shared
│       │   └── view-main.php
│       ├── categories
│       │   ├── view-add.php
│       │   ├── view-edit.php
│       │   └── view-index.php
│       ├── index
│       │   ├── view-home.php
│       │   └── view-index.php
│       └── tracks
│           ├── view-details.php
│           ├── view-edit.php
│           └── view-index.php
├── asset
│   ├── css
│   │   ├── icon.css
│   │   └── ...
│   ├── font
│   │   └── roboto
│   ├── image
│   │   └── ..
│   └── js
│       ├── santourjs.js
│       └── ...
├── index.php
└── library
    ├── entity
    │   ├── class.Category.php
    │   ├── class.Coordinate.php
    │   ├── class.Difficulty.php
    │   ├── class.Pod.php
    │   ├── class.Poi.php
    │   ├── class.Track.php
    │   ├── class.Category.php
    │   └── class.User.php
    ├── mvc
    │   ├── class.Controller.php
    │   ├── class.Model.php
    │   └── class.View.php
    ├── php
    │   ├── class.FirebaseInterface.php
    │   ├── class.FirebaseLib.php
    │   └── class.FirebaseStub.php
    ├── utils
    │   ├── class.Redirect.php
    │   └── class.Toast.php
    ├── autoload.php
    ├── class.router.php
    └── function.php
```

## Technical choices

We made several technical choices for this project:
•	For the database, we use Firebase like in the android project.
•	For displaying the map, we use the google map API.
•	And for the design we implement materialize.

## Authors

* **Audrey Michel** - *User interface* - [audreycelia](https://github.com/audreycelia)
* **Colin Chappot** - *Geolocalisation and Map* - [ColinChappot](https://github.com/ColinChappot)
* **Kévin Carneiro** - *Web Interface* - [kevdlc](https://github.com/kevdlc)
* **Lucien Zuber** - *Database and architecture* - [FinalCondom](https://github.com/FinalCondom)
* **Luca Centofanti** - *Scrum Master* - [Centoroma](https://github.com/Centoroma)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
