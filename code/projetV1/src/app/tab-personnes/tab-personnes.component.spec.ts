import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabPersonnesComponent } from './tab-personnes.component';

describe('TabPersonnesComponent', () => {
  let component: TabPersonnesComponent;
  let fixture: ComponentFixture<TabPersonnesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabPersonnesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabPersonnesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
