provider "google" {
  project = "demispaargaren"
  region  = "europe-west4"
}

resource "google_artifact_registry_repository" "demispaargaren" {
  location      = "europe-west4"
  repository_id = "demispaargaren"
  description   = "Docker repository for demispaargaren.nl"
  format        = "DOCKER"

  docker_config {
    immutable_tags = true
  }
}
