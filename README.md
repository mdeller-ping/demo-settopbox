# demo-settopbox

Example demo of the OAuth 2.0 Device Authorization Grant (https://tools.ietf.org/html/rfc8628) using PingFederate

![Example Screenshot](/images/example.png?raw=true)

## Prerequisites

* PingFederate
* OAuth Client in PingFederate configured for Device Auth Grant
* Access Token includes givenName claim
* Docker or Kubernetes

## Installation

### build image from source and run as a container locally (why are you doing this?)

``docker build --no-cache -t demo-settopbox .``

``docker run -p 80:80 demo-settopbox``

### deploy from docker hub locally (this is what you should be doing)

``docker run -p 80:80 michaeldeller/demo-settopbox``

### deploy from docker hub and expose with load balancer on kubernetes (even better)

``kubectl create deployment --image=michaeldeller/demo-settopbox friendlyname-demo-settopbox``

``kubectl expose deployment friendlyname-demo-settopbox --port=80 --target-port=80 --type=LoadBalancer --name=friendlyname-demo-settopbox-lb``

## Configuration

* Edit config.php and specify your PingFederate Hostname and Client ID

## Usage

* Navigate to http://localhost/ (or your k8s load balancer or ingress controller) and follow the instructions

## Troubleshooting

* Verify http://localhost/step1/ does not present any error messages