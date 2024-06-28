provider "google" {
  project = "demispaargaren"
  region  = "europe-west4"
}

resource "google_project_service" "run_api" {
  service            = "run.googleapis.com"
  disable_on_destroy = true
}

resource "google_cloud_run_v2_service" "default" {
  name     = "demispaargaren-nl"
  location = "europe-west4"

  template {
    containers {
      image = "gcr.io/cloudrun/hello"
    }
  }

  depends_on = [google_project_service.run_api]
}

resource "google_cloud_run_v2_service_iam_member" "noauth" {
  location = google_cloud_run_v2_service.default.location
  name     = google_cloud_run_v2_service.default.name

  role     = "roles/run.invoker"
  member   = "allUsers"
}
