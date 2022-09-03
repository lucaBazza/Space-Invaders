FROM node:12.14.1

#WORKDIR /mytestapp
# COPY package.json package-lock.json ./
RUN npm install -g npm
# RUN npm install
RUN npm install -g firebase-tools
EXPOSE 9005
# COPY . .

# docker-compose exec web firebase login:ci