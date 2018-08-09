import { MyMapPage } from './app.po';

describe('my-map App', () => {
  let page: MyMapPage;

  beforeEach(() => {
    page = new MyMapPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!');
  });
});
