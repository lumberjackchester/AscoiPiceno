function MyVm() {
    var self = this;  
    self.TopNav = new TopNavVm();
    self.HomePage = new HomePageVm();
    self.WinePage = new WinePageVm();
    self.AboutPage = new AboutPageVm();
    self.AwardsPage = new AwardsPageVm();
    self.FindWinesPage = new FineWinesPageVm();
    self.Init = function() {
        self.TopNav.Init();

    };
}


function TopNavVm() {
    var self = this;
    self.Links = ko.observable();
    self.GetTopNav = function(response) {
        if (response) {
            self.Links(ko.mapping.fromJS(response));
        }
    };
    self.Init = function() {
        $.get('/json/TopNav.json', self.GetTopNav);
    };
}

function HomePageVm() {
    var self = this;
    self.Init = function () {

    };
}
function WinePageVm() {
    var self = this;
    self.Reds = ko.observable();
    self.Whites = ko.observable();
    self.FilterWinesByVineyard =function (vine, $data) {
      var wines =  _.filter($data(), function (w) {
            return w.VineYard == vine;
      });
        return wines;
    };
    self.GetWines = function (response) {
        if (response) {
            self.Reds(response.Reds);
            self.Whites(response.Whites);
        }
    };
    self.Init = function () {
        $.get('/json/Wines.json', self.GetWines);
    };
}
function AboutPageVm() {
    var self = this;
    self.Init = function () {

    };
}
function AwardsPageVm() {
    var self = this;
    self.Init = function () {

    };
}
function FineWinesPageVm() {
    var self = this;
    self.Init = function () {

    };
}