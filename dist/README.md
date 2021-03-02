# demo-settopbox

## build the image from source and run as a container locally

``docker build --no-cache -t demo-settopbox .``

``docker run -p 80:80 demo-settopbox``

## deploy from docker hub locally

``docker run -p 80:80 michaeldeller/demo-settopbox``

## deploy from docker hub and expose with load balancer on kubernetes

``kubectl create deployment --image=michaeldeller/demo-settopbox friendlyname-demo-settopbox``

``kubectl expose deployment friendlyname-demo-settopbox --port=80 --target-port=80 --type=LoadBalancer --name=friendlyname-demo-settopbox-lb``
