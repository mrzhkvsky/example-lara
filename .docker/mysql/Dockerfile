FROM mysql:8

ARG TZ

RUN echo ${TZ} > /etc/timezone
RUN dpkg-reconfigure -f noninteractive tzdata
