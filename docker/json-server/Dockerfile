FROM node:14

RUN npm install -g json-server

WORKDIR /data


EXPOSE 3000

CMD ["npx", "json-server", "--watch", "db.json", "--host", "0.0.0.0", "--port", "3000"]
