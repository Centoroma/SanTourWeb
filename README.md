# 645-2 Santour

This project has been made by a group of the HES-SO Valais Wallis Student in the context of an android development course.
This project is separated into two parts: a web interface and an android application.
You can find the web interface project here: https://github.com/Centoroma/SanTourWeb

## Getting Started

In order to run this project, you will need to upload this project on your android studio, 

configure your firebase database and allow the modification of the database by everyone, 

configure the firebase Storage and allow its modification for everyone

and simply run the programm using your smartphone or an android emulator.

### Prerequisites

The prerequisites of this project are: 
```
Android Studio 3.0.1 or higher
An android SDK 18 or higher (target build:  android SDK 26)
GPS emulator (if you want to use the android emulator)
```

## Project Structure

We build this project to follow a standard N-Tier architecture:
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

## Navigation

The navigation of our project work like this:
```
MainActivity
├── fragment_create_track
│   ├── fragment_create_pod
│   │   └── fragment_details_pod ─── details_row
│   └── fragment_create_pod
├── fragment_poi_pod_list ─── pod_row
│   ├── fragment_update_pod
│   │   └── fragment_update_details_pod ─── details_row
│   └── fragment_update_poi
├── fragment_about
└── fragment_settings
```

We have implemented only one activity in order to manage the recording of our tracks even when the application is not active

## Technical choices

When we arrive on our application, you first need to start creating a track, this will enable the recording on firebase, we have also enable the offline registration.

In order to be certain to record only one track at a time, we create a class CurrentRecordingTrack that have a track in static, with that we are certain to have only one track at a time.

To store pictures inside our database we choose to use the storage of firebase. The path to the image is image/[Id_Track]/POD(POI)/picture[numbeer of the POD/POI in the track].jpg

## Authors

* **Audrey Michel** - *User interface* - [audreycelia](https://github.com/audreycelia)
* **Colin Chappot** - *Geolocalisation and Map* - [ColinChappot](https://github.com/ColinChappot)
* **Kévin Carneiro** - *Web Interface* - [kevdlc](https://github.com/kevdlc)
* **Lucien Zuber** - *Database and architecture* - [FinalCondom](https://github.com/FinalCondom)
* **Luca Centofanti** - *Scrum Master* - [Centoroma](https://github.com/Centoroma)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details