#! /bin/bash
# exit script when any command ran here returns with non-zero exit code
set -e

COMMIT_TAG=$CIRCLE_TAG

# We must export it so it's available for envsubst
export COMMIT_TAG=$COMMIT_TAG

# since the only way for envsubst to work on files is using input/output redirection,
#  it's not possible to do in-place substitution, so we need to save the output to another file
#  and overwrite the original with that one.
envsubst <./.k8s/manifest-europe.yml >./.k8s/manifest-europe.yml.out
mv ./.k8s/manifest-europe.yml.out ./.k8s/manifest-europe.yml

echo "$K8S_EUROPE_CERTIFICATE" | base64 --decode > cert.crt

./kubectl \
  --kubeconfig=/dev/null \
  --server=$K8S_EUROPE_SERVER \
  --certificate-authority=cert.crt \
  --token=$K8S_EUROPE_TOKEN \
  apply -f ./.k8s/manifest-europe.yml
